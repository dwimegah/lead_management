@extends('layout')

@section('create')
        <h2>Leads Form</h2>
        <form action="{{ route('leads.save') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="user_name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="user_email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="user_phone" required>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">Product Interest</label>
                <input type="tel" class="form-control" id="phone" name="user_phone" required>
            </div>
            <button type="submit" name="submit_form" class="btn btn-primary">Submit</button>
        </form>
    </div>


