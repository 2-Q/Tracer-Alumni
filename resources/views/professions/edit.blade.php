@extends('professions.dashboard')
@section('create')
    <div class="card">
        <div style="font-weight: bold" class="card-header">
            Edit Lowongan
        </div>
        <div class="card-body">
            <form action="/professions/{{ $profession->slug }}/edit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <input type="text" disabled value="{{  auth()->user()->name }}"  name="user_id[]" id="user_id"  class=" form-control">
                            @error('user_id')  
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <p><img src="{{ asset('Storage/'.$profession->thumbnail) }}" alt="" width="100"></p>
                            <input type="file" name="thumbnail" id="thumbnail" class=" form-control-file">
                            @error('thumbnail')  
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Pekerjaan</label>
                            <input type="text" name="name" autocomplete="off" value="{{ old('name') ?? $profession->name }}" id="name" class=" form-control">
                            @error('name')  
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company">Nama Perusahaan</label>
                            <input type="text" name="company" autocomplete="off" value="{{ old('company') ?? $profession->company }}" id="company" class=" form-control">
                            @error('company')  
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="owner">Pemilik Perusahaan</label>
                            <input type="text" name="owner" autocomplete="off"  id="owner" value="{{ old('owner') ?? $profession->owner }}" class=" form-control">
                            @error('owner')  
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="requirtmen">Persayaratan</label>
                            <textarea name="requirtmen" autocomplete="off" class="form-control"  id="requirtmen" style="height: 100px">
                                {{ old('requirtmen') ?? $profession->requirtmen }}
                            </textarea>
                            @error('requirtmen')  
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="about">Deskripsi Lowongan</label>
                            <textarea name="about" autocomplete="off" class="form-control"  id="about" style="height: 100px">
                                {{ old('about') ?? $profession->about }}
                            </textarea>
                            @error('about')  
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contactperson">Hubungi</label>
                            {{--  <input name="contactperson" class="form-control col-md-4" type="text" placeholder="Disabled input" value="{{ Auth::user()->name }}" disabled>  --}}
                            <input type="text" name="contactperson" autocomplete="off" value="{{ old('contactperson') ?? $profession->contactperson }}" id="contactperson" class=" form-control">
                            @error('contactperson')  
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" hidden>
                            <label for="statuse">Status</label>
                            <input type="text" value="1" name="statuse" autocomplete="off" id="statuse" class=" form-control">
                            @error('statuse')  
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
              

                <button type="submit" class="btn btn-primary float-left">Simpan</button>
                
            </form>
        </div>
    </div>
@endsection