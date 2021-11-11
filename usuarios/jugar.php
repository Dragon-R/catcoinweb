<?php include("template/cabecera.php"); ?>

    <div id="jugar" class="container">
        <div class="row">
            <div class="col">
                <h1>Cómo Jugar</h1>
                <p>Para que el usuario empiece a jugar tendrá que crear una partida de 2 a 4 jugadores e invitar a sus amigos, o buscar partidas creadas donde pueda integrarse, podrán escoger el personaje que más les guste. Una vez dentro de la partida empezarán a subir las plataformas tomando las monedas a medida que suban, el escenario recorrerá infinitamente hacia abajo mientras los jugadores saltan para no perder.</p>
                <h2>Tendrán que evitar obstáculos como:</h2>
                <ul>
                    <li>Los resortes: Estarán en ciertas plataformas, cuando el jugador los pise, este chocará con una plataforma superior y perderá el 25% de sus monedas, el jugador caerá a plataformas inferiores y tendrá desventaja en el juego.</li>
                    <li>Retrasarse: Si uno de los jugadores se queda abajo y el recorrido del juego lo alcanza perderá la partida.</li>
                    <li>Mordidas: Los jugadores deben evitar ser mordidos por los demás. Al ser mordidos, desaparecerán por 3 segundos de la partida, perderán el 50% de sus monedas que los demás podrán recoger, luego reaparecerán para continuar el juego con el 50% de monedas restantes.</li>
                    <li>Empujones: Los jugadores podrán empujarse entre ellos, si estos caen perderán la partida automáticamente.</li>
                </ul>
                <p>Cada 50 segundos mientras los jugadores vayan saltando en las plataformas, se otorgará un tiempo de 10 segundos de muerte súbita, esto significa que las mordidas ahora eliminan automáticamente, aparecerá un obstáculo “pared” en la parte superior de todas las plataformas que pausará el recorrido y bloqueando el paso a los jugadores, en este tiempo de 10 segundos los jugadores tendrán que morderse entre ellos para eliminarlos y quedarse con sus monedas, pasados los 10 segundos la pared desaparecerá y los jugadores que quedaron vivos podrán seguir avanzando, esto pasara hasta que solo quede un jugador que será el ganador, el dinero será trasferido a su cuenta de usuario.</p>
            </div>
        </div>
    </div>

<?php include("template/pie.php"); ?>