<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css" rel="stylesheet">
<style>
body{
    background:#7CB9E8;
}

.card{
    border:none;
    position:relative;
    overflow:hidden;
    border-radius:8px;
    cursor:pointer;
}
.editForm{
    width: 1110px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            background-color: #8E24AA;
            opacity = 0.6;
}

.card:before{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#E1BEE7;
    transform:scaleY(1);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:after{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#8E24AA;
    transform:scaleY(0);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:hover::after{
    transform:scaleY(1);
}


.fonts{
    font-size:11px;
}

.social-list{
    display:flex;
    list-style:none;
    justify-content:center;
    padding:0;
}

.social-list li{
    padding:10px;
    color:#8E24AA;
    font-size:19px;
}


.buttons button:nth-child(1){
       border:1px solid #8E24AA !important;
       color:#8E24AA;
       height:40px;
}

.buttons button:nth-child(1):hover{
       border:1px solid #8E24AA !important;
       color:#fff;
       height:40px;
       background-color:#8E24AA;
}

.buttons button:nth-child(2){
       border:1px solid #8E24AA !important;
       background-color:#8E24AA;
       color:#fff;
        height:40px;
}
</style>
</head>
<body>
<div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-12">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="{{ asset('img/' . $profile->img) }}" width="100" class="rounded-circle">
                </div>
                
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white">Student</span>
                    <h5 class="mt-2 mb-0">{{ $profile->name}}</h5>
                    <span>{{ $profile->email}}</span>
                    
                    <div class="px-4 mt-1">
                        <p class="fonts">I am a student of LearnIt </p>
                    
                    </div>
                    
                     <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-dribbble"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                        <li><i class="fa fa-google"></i></li>
                    </ul>
                    
                    <div class="buttons">
                    <button class="btn btn-primary px-4 ms-3 update-profile">Update Profile</button>
                </div>
                </div>
                
               
                
                
            </div>
            <br> <br>
             <div class="formDiv">
            </div>
            
        </div>
        
    </div>
    
</div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script>
        var password = "{{ Auth::user()->password}}";
        var name = "{{ Auth::user()->name }}";
        var email = "{{ Auth::user()->email }}";
        var image = "{{ Auth::user()->img }}";
        $(document).ready(function(){
        $('.update-profile').click(function(e) {
            e.preventDefault(); // Prevent default form submission
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }});
            $.ajax({
                url: '/user/getForm',
                method: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        var formHtml = `
                         <form class="editForm" action={{route('dashboard.profile.update')}} method=post>
                         @csrf
                          <label>Name</label> <br>
                         <input type="text" name="name" id="name" style="width: 1075px;" value="${name}"/> <br>
                         <label>email</label> <br>
                         <input type="email" name="email" id="email" style="width: 1075px;" value="${email}" /> <br>
                         <label>Password</label> <br>
                        <input type="password" name="password" style="width: 1075px;" id="password" value="${password}" />
                        <label>Image</label> <br>
                         <input type="file" name="img" style="width: 1075px;" id="img"/>
                         <input type=submit value="save" class="btn btn-success">
                       </form>  
                        `;
                        $('.formDiv').html(formHtml);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(error);
                }
            });
        });
        });
    </script>
</html>
