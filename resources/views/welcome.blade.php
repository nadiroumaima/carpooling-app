<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>YOUR CARPOOLING APP</title>
        <!-- Fonts -->
        
       <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

*,*:before,*:after{box-sizing:border-box}

body{
  min-height:100vh;
  font-family: 'Raleway', sans-serif;
}

.container{
  position:absolute;
  width:100%;
  height:100%;
  overflow:hidden;
  
  &:hover,&:active{
    .top, .bottom{
      &:before, &:after{
        margin-left: 200px;
        transform-origin: -200px 50%;
        transition-delay:0s;
      }
    }
    
    .center{
      opacity:1;
      transition-delay:0.2s;
    }
  }
}

.top, .bottom{
  &:before, &:after{
    content:'';
    display:block;
    position:absolute;
    width:200vmax;
    height:200vmax;
    top:50%;left:50%;
    margin-top:-100vmax;
    transform-origin: 0 50%;
    transition:all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
    z-index:10;
    opacity:0.65;
    transition-delay:0.2s;
  }
}

.top{
  &:before{transform:rotate(45deg);background:#e46569;}
  &:after{transform:rotate(135deg);background:#ecaf81;}
}

.bottom{
  &:before{transform:rotate(-45deg);background:#60b8d4;}
  &:after{transform:rotate(-135deg);background:#3745b5;}
}

.center{
  position:absolute;
  width:400px;
  height:400px;
  top:50%;left:50%;
  margin-left:-200px;
  margin-top:-200px;
  display:flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding:30px;
  opacity:0;
  transition:all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
  transition-delay:0s;
  color:#333;
  
  .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: purple;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    border: none;
    font-weight: bold;
    cursor: pointer;
  }
  .button:hover {
    background-color:   #e46569;}
 /* Changes the text color to red on hover */
  }
 </style>

<div class="container" onclick="">
    <div class="top"></div>
    <div class="bottom"></div>
    <div class="center">
       <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px" viewBox="0 0 1024 1024" class="icon" version="1.1"><path d="M234.666667 682.666667a21.333333 21.333333 0 0 0-21.333334-21.333334H128a21.333333 21.333333 0 0 0-21.333333 21.333334v128a21.333333 21.333333 0 0 0 21.333333 21.333333h85.333333a21.333333 21.333333 0 0 0 21.333334-21.333333v-128zM917.333333 682.666667a21.333333 21.333333 0 0 0-21.333333-21.333334h-85.333333a21.333333 21.333333 0 0 0-21.333334 21.333334v128a21.333333 21.333333 0 0 0 21.333334 21.333333h85.333333a21.333333 21.333333 0 0 0 21.333333-21.333333v-128z" fill="#455A64"/><path d="M938.666667 426.666667H85.333333a21.333333 21.333333 0 0 0-21.333333 21.333333v42.666667a21.333333 21.333333 0 0 0 21.333333 21.333333h853.333334a21.333333 21.333333 0 0 0 21.333333-21.333333v-42.666667a21.333333 21.333333 0 0 0-21.333333-21.333333z" fill="#AB47BC"/><path d="M874.666667 490.666667l-42.666667-21.226667C824.874667 469.376 199.082667 469.333333 192 469.333333l-42.666667 21.333334c-23.552 0-42.666667 40.448-42.666666 64v170.666666a21.333333 21.333333 0 0 0 21.333333 21.333334h768a21.333333 21.333333 0 0 0 21.333333-21.333334v-170.666666c0-23.552-19.114667-64-42.666666-64z" fill="#AB47BC"/><path d="M848.768 490.709333c-3.050667-18.944-8.170667-48.704-16.768-96.042666C810.666667 277.333333 769.92 192 693.333333 192h-362.666666c-76.586667 0-118.677333 96-138.666667 202.666667-8.704 46.421333-13.866667 76.650667-16.917333 96.042666h673.685333z" fill="#AB47BC"/><path d="M874.666667 661.333333a21.333333 21.333333 0 0 1-21.333334 21.333334H170.666667a21.333333 21.333333 0 0 1-21.333334-21.333334v-64a21.333333 21.333333 0 0 1 21.333334-21.333333h682.666666a21.333333 21.333333 0 0 1 21.333334 21.333333v64z" fill="#212121"/><path d="M202.666667 629.333333m-32 0a32 32 0 1 0 64 0 32 32 0 1 0-64 0Z" fill="#FFEB3B"/><path d="M821.333333 629.333333m-32 0a32 32 0 1 0 64 0 32 32 0 1 0-64 0Z" fill="#FFEB3B"/><path d="M790.016 402.282667C771.157333 298.666667 743.552 234.666667 693.333333 234.666667h-362.666666c-46.677333 0-78.613333 71.232-96.725334 167.872A4333.76 4333.76 0 0 0 221.866667 469.333333h580.053333c-2.901333-16.917333-6.762667-38.698667-11.904-67.050666z" fill="#E3F2FD"/><path d="M352 448c-41.173333 0-74.666667-33.450667-74.666667-74.666667s33.493333-74.666667 74.666667-74.666666 74.666667 33.450667 74.666667 74.666666-33.493333 74.666667-74.666667 74.666667M650.666667 448c-41.173333 0-74.666667-33.450667-74.666667-74.666667s33.493333-74.666667 74.666667-74.666666 74.666667 33.450667 74.666666 74.666666-33.493333 74.666667-74.666666 74.666667" fill="#FFB74D"/><path d="M501.333333 373.333333c-29.397333 0-53.333333-23.914667-53.333333-53.333333s23.936-53.333333 53.333333-53.333333S554.666667 290.581333 554.666667 320s-23.936 53.333333-53.333334 53.333333" fill="#FFA726"/>
</svg> 
      <h2>Let's Carpool </h2>
      <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                
                @auth
                    <a href="{{ url('/dashboard') }}" class="button">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="button">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button">Register</a>
                    @endif
                @endauth
            </div>
        @endif

      <h2>&nbsp;</h2>
    </div>
  </div>
  
</html>