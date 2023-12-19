<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Home</title>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="titulo">
                TC Games - MMORPG Épico
            </h2>
        </x-slot>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f3f3f3;
                color: #333;
                padding: 5px;
                line-height: 1.6;
                text-align: center;
            }

            h1 {
                color: #FF6347;
                font-size: 2em;
                margin-bottom: 10px;
            }
            h2.titulo {
                color: #6B46C1;
                font-size: 2em;
                font-weight: bold;
                margin-bottom: 10px;
            }
            h2 {
                color: #6B46C1;
                font-size: 1.5em;
                margin-top: 20px;
            }

            img {
                display: block;
                margin: 0 auto; /* Isso centraliza a imagem horizontalmente */
                width: 400px; /* Define a largura máxima como 100% da largura do contêiner pai */
                height: auto; /* Mantém a proporção da imagem */
                margin-bottom: 20px; /* Adiciona algum espaço abaixo da imagem */
            }

            footer {
                margin-bottom: 0;
                margin-top: 2%;
                padding: 5px;
                background-color: #333;
                color: #fff;
            }
        </style>
    </head>

    <body>
        <h1>Explore um mundo épico em <span style="color: #8A2BE2;">TC Games</span>, o MMORPG que redefine a jornada do herói!
        </h1>

        <p>Embarque em uma aventura imersiva e descubra os segredos de um universo vasto e cheio de magia. TCGames
            oferece gráficos deslumbrantes, criaturas lendárias e batalhas emocionantes em tempo real.</p>
        <img src="image/home-1.jpg" alt="Tela de Entrada">

        <h2>Crie Seu Herói:</h2>
        <p>Personalize seu avatar com uma variedade de opções de classes, habilidades e aparências únicas. Seja um destemido
            guerreiro, um mago poderoso ou um ágil arqueiro.</p>
            <img src="image/home-2.jpg" alt="Vocações">

        <h2>Mundos Dinâmicos:</h2>
        <p>Explore reinos deslumbrantes, de vastas florestas a cidades místicas. Cada cenário é repleto de missões
            intrigantes, monstros desafiadores e tesouros inexplorados.</p>
            <img src="image/home-3.jpg" alt="Aventura">

        <h2>Jogue TCGames Agora!</h2>
        <p>Baixe TCGames gratuitamente e comece sua jornada hoje. Desvende segredos, desafie o destino e torne-se uma
            lenda em um dos melhores MMORPGs da atualidade!</p>

        <!-- Rodapé -->
        <footer>
            &copy; 2023 Thiago Castro. Todos os direitos reservados.
        </footer>
    </body>
</x-app-layout>

</html>
