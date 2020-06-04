@extends('layouts.user_dashboard')
@section('current_section')

<h3 class='section-header mb-2'><i class="fas fa-pager"></i> Manage Portfolio Page</h3>
<hr>

<form method='post' action="/home/portfolio/setup" class="form">
  @csrf
  <div class="form-group">
    <label>Select Global Theme:</label>
    <select name="theme" class='form-control w-auto'>
      <option {{$portfolio_entry->theme == 'litera' ? 'selected' : ''}} value="litera">Litera</option>
      <option {{$portfolio_entry->theme == 'journal' ? 'selected' : ''}} value="journal">Journal</option>
      <option {{$portfolio_entry->theme == 'lux' ? 'selected' : ''}} value="lux">Lux</option>
      <option {{$portfolio_entry->theme == 'material' ? 'selected' : ''}} value="material">Material</option>
      <option {{$portfolio_entry->theme == 'minty' ? 'selected' : ''}} value="minty">Minty</option>
      <option {{$portfolio_entry->theme == 'pulse' ? 'selected' : ''}} value="pulse">Pulse</option>
      <option {{$portfolio_entry->theme == 'sketchy' ? 'selected' : ''}} value="sketchy">Sketchy</option>
      <option {{$portfolio_entry->theme == 'united' ? 'selected' : ''}} value="united">United</option>
    </select>
  </div>

  <button class="btn btn-success">Save Settings</button>
</form>

@endsection
