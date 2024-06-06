@extends('layouts.app')

@section('content')
<style>

body{
  align-items: center;
  /* justify-content: center; */
  min-height: 100vh;
  padding: 10px;
  font-family: 'Poppins', sans-serif;
  /* background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%); */
}
.container{
  max-width: 800px;
  background: #fff;
  width: 800px;
  padding: 25px 40px 10px 40px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.container .text{
  text-align: center;
  font-size: 41px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.container form{
  padding: 30px 0 0 0;
}
.container form .form-row{
  display: flex;
  margin: 32px 0;
}
form .form-row .input-data{
  width: 70%;
  height: 20px;
  margin: 10px 15px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
}
.input-data input,
.textarea textarea{
  display: block;
  width: 90%;
  height: 100%;
  /* border: none; */
  font-size: 17px;
  /* border-bottom: 2px solid rgba(0,0,0, 0.12); */
}
.input-data input:focus ~ label, .textarea textarea:focus ~ label,
.input-data input:valid ~ label, .textarea textarea:valid ~ label{
  /* transform: translateY(-20px); */
  font-size: 14px;
  color: #3498db;
}
.textarea textarea{
  resize: none;
  padding-top: 10px;
}
.input-data label{
  position: absolute;
  pointer-events: none;
  bottom: 20px;
  font-size: 16px;
  transition: all 0.3s ease;
}
.textarea label{
  width: 100%;
  bottom: 40px;
  background: #fff;
}
.input-data .underline{
  position: absolute;
  bottom: 0;
  height: 2px;
  width: 100%;
}
.input-data .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: #3498db;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}
.input-data input:focus ~ .underline:before,
.input-data input:valid ~ .underline:before,
.textarea textarea:focus ~ .underline:before,
.textarea textarea:valid ~ .underline:before{
  transform: scale(1);
}
.submit-btn .input-data{
  overflow: hidden;
  height: 45px!important;
  width: 25%!important;
}
.submit-btn .input-data .inner{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #cdcfcf, #898c8d, #636565, #5d6162);
  transition: all 0.4s;
}
.submit-btn .input-data:hover .inner{
  left: 0;
}
.submit-btn .input-data input{
  background: none;
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  position: relative;
  z-index: 2;
}
@media (max-width: 700px) {
  .container .text{
    font-size: 30px;
  }
  .container form{
    padding: 20px 0 0 30;
  }
  .container form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin-top: 50px !important;
    width: 40%!important;
  }
  .submit-btn .input-data{
    width: 60%!important;
  }
}



</style>


<div class="">
    <div class="box ">
        <div class="box-header">
            <h2 style="font-weight: bold;font-size:1.2rem"><i class="halflings-icon user"></i><span class="break"></span>Expence Create</h2>
        </div>

        <div class="container">
            <form action="{{ url('/expence-invoice-store') }}" method="POST">
                @csrf
               <div class="form-row">
                  <div class="input-data">

                        @php
                            $categoriess = App\Models\Expence_Category::all();
                        @endphp
                        <label for=""> Categories </label>
                        <select type="text" name="category_id" id="date">

                            <option style="font-size:1.1rem" value="">Select One</option>
                            @foreach ($categoriess as $categori )
                            <option style="font-size:1.1rem" value="{{ $categori->id }}">{{ $categori->category  }}</option>
                            @endforeach
                        </select>

                  </div>
                  <div class="input-data">
                    <input type="text" name="amount" required>
                    <label for="">Amount</label>
                  </div>
               </div>
               <div class="form-row">
                    <div class="input-data">
                        <input type="text" required name="description">
                        <label for="">Description</label>
                    </div>
                </div>
                <div class="input-data textarea">
                    <div class="form-row submit-btn">
                       <div class="input-data">
                          <div class="inner"></div>
                          <input type="submit" value="submit">
                       </div>
                    </div>
                </div>
            </form>
            {{-- <form  action="{{ url('/expence-invoice-store') }}" method="POST"  style="text-align:center;margin-top:3rem">
                @csrf

                <div class="form-row" style="">
                    <div class="input-data">

                        @php
                            $categoriess = App\Models\Expence_Category::all();
                        @endphp
                        <label for="">  </label>
                        <select type="text" name="category_id" id="date">

                            <option style="font-size:1.1rem" value="">Categories</option>
                            @foreach ($categoriess as $categori )
                            <option style="font-size:1.1rem" value="{{ $categori->id }}">{{ $categori->category  }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-data" style="width:35%;margin:0 auto;margin-top:1rem">
                        <label for="">Amount</label>
                        <input type="text" name="amount" required>
                    </div>
                </div>
                <div class="form-row" style="margin-top:1.3rem">
                    <div class="data">
                        <label for="">Description</label>
                        <input type="text" name="description" >
                    </div>

                </div>


                    <div class="form-row submit-btn">
                        <div class="input-data">
                            <div class="inner">

                            </div>
                            <input class="btn btn-primary" type="submit" value="submit">
                        </div>
                    </div>
            </form> --}}

            {{-- </div> --}}

        </div>



    </div>
</div>



<script>
    @if (Session::has('message'))

    toastr.options={
          'clossButton':true,
          'progressBar':true
    }

    toastr.success("{{ Session::get('message') }}"
    // , 'Success! New Student added'
    );

    // toastr.warnig("{{ Session::get('message') }}"
    // , 'Success! New Student added'
    // );

    @endif
</script>
@endsection

