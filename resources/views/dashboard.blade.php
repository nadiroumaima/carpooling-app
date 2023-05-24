<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('"Welcome aboard! Join our carpooling community and enjoy eco-friendly ridesharing experiences.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}



                </div>
            </div>
        </div>
    </div>

    @section('content')
<style>
    .picture-container-wrapper {
        display: flex;
        justify-content: center;
        align-items: center; /* Center the child elements vertically */
        height: 100vh;
    }
    .picture-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin: 0 10px;
        width: 200px;
        height: 300px;
        box-sizing: border-box;
        padding: 20px;
        background-color: #7c436f;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    .picture-container h1 {
        font-weight: bold;
        color: #333333;
    }
    .picture-container:hover {
        transform: translateY(-10px);
    }

    .picture-container img {
        width: 100%; /* Make the images fill the container width */
        margin-bottom: 10px;
    }
    body {
        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        height: 100vh;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
</style>
<body>
<div class="picture-container-wrapper">
<div class="picture-container">
    <img class="Pn4dOA" alt="Icône de remboursement d'argent" srcset="https://image.canva.com/YaLS2xiNItp6w6giqxH-RA%3D%3D/criAPDObnbY3yLh0M-zCPw%3D%3D.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIAQYCGKMUH25PN7VSL%2F20230523%2Fus-east-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230523T173911Z&amp;X-Amz-Expires=73544&amp;X-Amz-Signature=87c29c64af1055a5be9e077eb010ce70d556e3e469778a68224ab2d385d744c6&amp;X-Amz-SignedHeaders=host&amp;response-expires=Wed%2C%2024%20May%202023%2014%3A04%3A55%20GMT 800w" sizes="(max-width: 600px) 100vw, (max-width: 900px) 66vw, 800px" src="./Icône de remboursement d'argent - Icônes de Canva_files/criAPDObnbY3yLh0M-zCPw==.png">
    <h1>Your pick of rides at low prices</h1>
</div>

<div class="picture-container">
    <img src="https://marketplace.canva.com/kAAJs/MAFBr_kAAJs/1/tl/canva-full-color-lined-efficiency-icon-MAFBr_kAAJs.png" alt="Picture 2">
    <h1>Scroll, click, tap and go!</h1>
</div>

<div class="picture-container">
    <img src="https://marketplace.canva.com/TQ8lc/MAFjn0TQ8lc/1/tl/canva-trust-MAFjn0TQ8lc.png" alt="Picture 3">
    <h1>Trust who you travel with</h1>
</div>
<div class="picture-container">
    <img class="Pn4dOA" alt="Icône de piste emplacement plat" srcset="https://marketplace.canva.com/PjP90/MAFV7iPjP90/1/tl/canva-flat-location-track-icon-MAFV7iPjP90.png 373w" sizes="(max-width: 600px) 100vw, (max-width: 900px) 66vw, 373px" src="./Icône de piste emplacement plat - Icônes de Canva_files/tl.webp">
    <h1>Customize your route </h1>
</div>
</div>
</body>
@endsection








</x-app-layout>
