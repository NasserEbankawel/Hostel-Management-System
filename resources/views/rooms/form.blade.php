<form class="container mt-5" action="{{ $action }}" method="POST">
    @csrf
    @isset($edit)
        @method('PATCH')
    @endisset

    <x-textfield name="room_number" label="Room Number" type="text" :value="old('room_number', $room->room_number)" placeholder="Enter RoomNnumber" />
    @php
        $type = [
            ['value' => 'single', 'label' => 'Single'],
            ['value' => 'double', 'label' => 'Double'],
            ['value' => 'dormitory', 'label' => 'Dormitory']
        ];
    @endphp
    <x-selectfield :options="$type" name="type" label="Select Room Type" :value="$room->type" />
    
    @php
        $status = [ 

            ['value' => 'occupied', 'label' => 'Occupied'], 
            ['value' => 'available', 'label' => 'Available']
           
        ];
    @endphp
    <x-selectfield :options="$status" name="status" label="Select Room Status" :value="$room->status" />


    
    <x-textfield name="capacity" label="Capacity" type="text" :value="old('capacity', $room->capacity)" placeholder="Enter Room's Capacity" />
    <x-textfield name="price_per_month" label="Price" type="text" :value="old('price_per_month', $room->price_per_month)" placeholder="Enter Price" />
    <x-selectfield :options="$hostels" name="hostel_id" label="Select Hostel" :value="$room->hostel_id"/>
 

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
