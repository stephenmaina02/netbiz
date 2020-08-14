@extends('customer.layouts.main')

@section('title','Spin to Win')
@section('page_title','Spin to Win')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-3">
            <h6><u>Pay to spin</u></h6>
            <div id="results"></div>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Amount to spin" name="spin" required>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
            </form>

                    <img id="spin_button" src="{{ asset('spin/spin_off.png') }}" alt="Spin" onClick="startSpin();" />
                    <a href="#" id="reset" class="btn mt-3 " onClick="resetWheel(); refreshPage(); return false;">Play Again</a>

            </div>
            <div class="col-md-5.6 the_wheel" height=438>
                <canvas id="canvas" width="434" height="434" class="mt-2">
                    <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                </canvas>
           </div>
</div>

</div>
<script>
    // Create new wheel object specifying the parameters at creation time.
    let theWheel = new Winwheel({
        'outerRadius': 212, // Set outer radius so wheel fits inside the background.
        'innerRadius': 75, // Make wheel hollow so segments don't go all way to center.
        'textFontSize': 24, // Set default font size for the segments.
        'textOrientation': 'vertical', // Make text vertial so goes down from the outside of wheel.
        'textAlignment': 'outer', // Align text to outside of wheel.
        'numSegments': 24, // Specify number of segments.
        'segments': // Define segments including colour and text.
            [ // font size and test colour overridden on backrupt segments.
            {
                'fillStyle': '#ee1c24',
                'text': '300'
            }, {
                'fillStyle': '#3cb878',
                'text': '450'
            }, {
                'fillStyle': '#f6989d',
                'text': '600'
            }, {
                'fillStyle': '#00aef0',
                'text': '750'
            }, {
                'fillStyle': '#f26522',
                'text': '500'
            }, {
                'fillStyle': '#000000',
                'text': 'BANKRUPT',
                'textFontSize': 16,
                'textFillStyle': '#ffffff'
            }, {
                'fillStyle': '#e70697',
                'text': '3000'
            }, {
                'fillStyle': '#fff200',
                'text': '600'
            }, {
                'fillStyle': '#f6989d',
                'text': '700'
            }, {
                'fillStyle': '#ee1c24',
                'text': '350'
            }, {
                'fillStyle': '#3cb878',
                'text': '500'
            }, {
                'fillStyle': '#f26522',
                'text': '800'
            }, {
                'fillStyle': '#a186be',
                'text': '300'
            }, {
                'fillStyle': '#fff200',
                'text': '400'
            }, {
                'fillStyle': '#00aef0',
                'text': '650'
            }, {
                'fillStyle': '#ee1c24',
                'text': '1000'
            }, {
                'fillStyle': '#f6989d',
                'text': '500'
            }, {
                'fillStyle': '#f26522',
                'text': '400'
            }, {
                'fillStyle': '#3cb878',
                'text': '900'
            }, {
                'fillStyle': '#000000',
                'text': 'BANKRUPT',
                'textFontSize': 16,
                'textFillStyle': '#ffffff'
            }, {
                'fillStyle': '#a186be',
                'text': '600'
            }, {
                'fillStyle': '#fff200',
                'text': '700'
            }, {
                'fillStyle': '#00aef0',
                'text': '800'
            }, {
                'fillStyle': '#ffffff',
                'text': 'LOOSE TURN',
                'textFontSize': 12
            }
        ],
        'animation': // Specify the animation to use.
        {
            'type': 'spinToStop',
            'duration': 10, // Duration in seconds.
            'spins': 3, // Default number of complete spins.
            'callbackFinished': alertPrize,
            'callbackSound': playSound, // Function to call when the tick sound is to be triggered.
            'soundTrigger': 'pin' // Specify pins are to trigger the sound, the other option is 'segment'.
        },
        'pins': // Turn pins on.
        {
            'number': 24,
            'fillStyle': 'silver',
            'outerRadius': 4,
        }
    });

    // Loads the tick audio sound in to an audio object.
    let audio = new Audio('{{ asset('spin/tick.mp3') }}');

    // This function is called when the sound is to be played.
    function playSound() {
        // Stop and rewind the sound if it already happens to be playing.
        audio.pause();
        audio.currentTime = 0;

        // Play the sound.
        audio.play();
    }

    // Vars used by the code in this page to do power controls.
    let wheelPower = 0;
    let wheelSpinning = false;

    // -------------------------------------------------------
    // Function to handle the onClick on the power buttons.
    // -------------------------------------------------------
    function powerSelected(powerLevel) {
        // Ensure that power can't be changed while wheel is spinning.
        if (wheelSpinning == false) {
            // Reset all to grey incase this is not the first time the user has selected the power.

            // Light up the spin button by changing it's source image and adding a clickable class to it.
            document.getElementById('spin_button').src = "{{ asset('spin/spin_on.png') }}";
            document.getElementById('spin_button').className = "clickable";
        }
    }

    // -------------------------------------------------------
    // Click handler for spin button.
    // -------------------------------------------------------
    function startSpin() {
        // Ensure that spinning can't be clicked again while already running.
        if (wheelSpinning == false) {
            // Based on the power level selected adjust the number of spins for the wheel, the more times is has
            // to rotate with the duration of the animation the quicker the wheel spins.
            var x = 102;
            var y = 999;

            var ran = Math.floor(Math.random() * (x - y) + y);
            theWheel.animation.spins = ran;
            // Disable the spin button so can't click again while wheel is spinning.
            document.getElementById('spin_button').src = "{{ asset('spin/spin_off.png') }}";
            document.getElementById('spin_button').className = "";

            // Begin the spin animation by calling startAnimation on the wheel object.
            theWheel.startAnimation();

            // Set to true so that power can't be changed and spin button re-enabled during
            // the current animation. The user will have to reset before spinning again.
            wheelSpinning = true;
        }
    }

    // -------------------------------------------------------
    // Function for reset button.
    // -------------------------------------------------------
    function resetWheel() {
        theWheel.stopAnimation(false); // Stop the animation, false as param so does not call callback function.
        theWheel.rotationAngle = 0; // Re-set the wheel angle to 0 degrees.
        theWheel.draw(); // Call draw to render changes to the wheel.



        wheelSpinning = false; // Reset to false to power buttons and spin can be clicked again.
    }

    // -------------------------------------------------------
    // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
    // -------------------------------------------------------
    function alertPrize(indicatedSegment) {
        // Just alert to the user what happened.
        // In a real project probably want to do something more interesting than this with the result.
        if (indicatedSegment.text == 'LOOSE TURN') {
            //alert('Sorry but you loose a turn.');
            document.getElementById('results').innerHTML += '<label class="text-danger">Sorry but you loose a turn</label>';
        } else if (indicatedSegment.text == 'BANKRUPT') {
            //alert('Oh no, you have gone BANKRUPT!');
            document.getElementById('results').innerHTML += '<label class="text-info">Oh no, you have gone BANKRUPT</label>';
        } else {
            //alert("You have won " + indicatedSegment.text);
            document.getElementById('results').innerHTML += '<label class="text-success">Congratulations You have won ' +indicatedSegment.text+'</label>';
        }
    }
    function refreshPage(){
        window.location.reload();
    }
</script>

@endsection
