
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <!-- Include any necessary styles (e.g., Bootstrap or custom CSS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="container">
    <h1>Add New Event</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Event Creation Form -->
    <!-- <form action="{{ route('events.store') }}" method="POST">
        @csrf 

 
        <div class="form-group">
            <label for="event_name">Event Name</label>
            <input type="text" name="event_name" id="event_name" class="form-control" required>
        </div>

    
        <div class="form-group">
            <label for="event_start_date">Start Date</label>
            <input type="date" name="event_start_date" id="event_start_date" class="form-control" required>
        </div>

       
        <div class="form-group">
            <label for="event_end_date">End Date</label>
            <input type="date" name="event_end_date" id="event_end_date" class="form-control" required>
        </div>

       
        <button type="submit" class="btn btn-primary">Add Event</button>
    </form> -->

     <!-- Judge Creation Form -->
     <form action="{{route('register1')}}" method="POST">
        @csrf 
        <div class="form-group mb-4">
            <label for="selected_event" class="block text-sm font-medium text-gray-700">Select Existing Event</label>
            <select name="selected_event" id="selected_event" class="mt-1 block w-full pl-3 pr-10 py-2 border-gray-300 rounded-md">
                <option value="">Choose an existing event</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                @endforeach
            </select>
        </div>

        
        <div class="form-group">
            <label for="name">Judge Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

   
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

       
        
            
            <input type="password" name="password" id="password" class="form-control" required hidden>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required hidden>
        

     
        <button type="submit" class="btn btn-primary">Add Judge</button>
    </form>
</div>

</body>
<script>
    function generateRandomString() {
        const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        const numbers = '0123456789';
        
        let result = '';
        
        for (let i = 0; i < 4; i++) {
            // Get a random letter
            result += letters.charAt(Math.floor(Math.random() * letters.length));
        }
        
        for (let i = 0; i < 4; i++) {
            // Get a random number
            result += numbers.charAt(Math.floor(Math.random() * numbers.length));
        }
        
        // Convert result string to an array to shuffle
        let resultArray = result.split('');
        
        // Shuffle the array to mix letters and numbers
        for (let i = resultArray.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [resultArray[i], resultArray[j]] = [resultArray[j], resultArray[i]];
        }
        
        // Join the array back into a string
        result = resultArray.join('');
        
        // Set the value of the input element with ID 'class_code'
        document.getElementById('password').value = result;
        document.getElementById('password_confirmation').value = result;
        console.log(result);
    }

    // Run the function when the page loads
    window.onload = generateRandomString;

   
</script>
</html>
