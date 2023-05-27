<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Styling the body */
        body {
            margin: 0;
            padding: 0;
        }
        /* Styling section, giving background
            image and dimensions */
        section {
            width: 100%;
            height: 100vh;
            background:
            url('{{ asset('/img/'.$event->img) }}');
                
            background-size: cover;
        }
        /* Styling the left floating section */
        section .leftBox {
            width: 1100px;
            height: 1000px;
            float: left;
            padding: 100px;
            box-sizing: border-box;
        }
        /* Styling the background of
            left floating section */
        section .leftBox .content {
            color: black;
            background: rgba(93,235, 157, 0.5);
            padding: 60px;
            transition: .5s;
    
        }
       
        /* Styling the header of left
            floating section */
        section .leftBox .content h1 {
            margin: 0px;
            padding: 0px;
            font-size: 100px;
            text-transform: uppercase;
        }
        /* Styling the paragraph of
            left floating section */
        section .leftBox .content p {
            margin: 10px 0 0;
            padding: 0;
            font-size: 20px;
        }  
    </style>
</head>
<body>
    <section>
        <div class="leftBox">
            <div class="content">
                <h1>
                {{ $event->name}}
                </h1>
                <p>
                {{ $event->longcontent}}
                </p>
            </div>
        </div>
        
    </section>
</body>
</html>
