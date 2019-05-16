import * as React from 'react';

import Style from './Home.style';

class Home extends React.Component {
  render(): React.ReactNode {
    const pokemon = {
      name: 'Carapuce',
      number: 7,
    };

    return (
      <Style.Intro>
        <div>Bienvenue sur ton futur pokédex !</div>
        <div>
          Tu vas pouvoir apprendre tout ce qu'il faut sur React, Redux et Symfony, et attraper des
          pokemons !
        </div>
        <div>
          <p>Voici mon premier pokemon:</p>
          <p>
            {pokemon.name}: n°{pokemon.number}
          </p>
          <img
            src={`https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${
              pokemon.number
            }.png`}
          />
        </div>
      </Style.Intro>
    );
  }
}

export default Home;
