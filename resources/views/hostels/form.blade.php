<form class="container mt-5" action="{{ $action }}" method="POST">
    @csrf
    @isset($edit)
        @method('PATCH')
    @endisset

    <x-textfield name="name" label="Hostel Name" type="text" :value="old('name', $hostel->name)" placeholder="Enter Hostel Name" />
    <x-textfield name="location" label="Location" type="text" :value="old('location', $hostel->location)" placeholder="Enter Location" />
    <x-textfield name="total_rooms" label="Number of Rooms" type="text" :value="old('total_rooms', $hostel->total_rooms)" placeholder="Enter Number of Rooms" />
    <x-textfield name="warden_name" label="Warden Name" type="text" :value="old('warden_name', $hostel->warden_name)" placeholder="Enter Warden Name" />
    <x-textfield name="contact_number" label="Contact" type="text" :value="old('contact_number', $hostel->contact_number)" placeholder="Enter Contact" />
 

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

