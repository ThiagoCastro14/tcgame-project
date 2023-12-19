<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <x-app-layout>
        <x-slot name="header">
            <h2>
                Fale Conosco
            </h2>
        </x-slot>
    <style>
         body {
                font-family: 'Arial', sans-serif;
                background-color: #f3f3f3;
                color: #333;
                padding: 20px;
                line-height: 1.6;
                text-align: center;
            }        

            h2 {
                color: #6B46C1;
                font-size: 2em;
                font-weight: bold;
                margin-bottom: 10px;
            }
            form {
    max-width: 400px; 
    margin: 0 auto; 
}

label {
    display: block; 
    margin-bottom: 5px; 
}

input,
textarea {
    width: 100%; 
    margin-bottom: 10px; 
    padding: 8px; 
}
      footer {
                margin-top: 250px;
                padding: 10px;
                background-color: #333;
                color: #fff;
            }
    </style>   
</head>
<body>
         
            <form action="{{ route('contato.store') }}" method="post">
                @csrf
                <label for="name">Nome:</label>               
                <input type="text" name="name" class="label" required>      
                <label for="email">E-mail:</label>
                <input type="email" name="email" required>   
                <label for="subject">Assunto:</label>               
                <input type="text" name="subject" class="label" required>      
                <label for="message">Mensagem:</label>
                <textarea name="message" required></textarea>           
                <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Enviar</button>
            </form>
    <footer>
        &copy; 2023 Thiago Castro. Todos os direitos reservados.
    </footer>
</body>
</x-app-layout>
</html>

