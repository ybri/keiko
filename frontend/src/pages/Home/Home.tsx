import * as React from 'react';

import request from 'superagent';
import StyledIntro from './Home.style';

interface PokemonInterface {
    id: number;
    name: string;
    spriteUrl: string
}

class Home extends React.Component {

  state = {
      pokemonList: [],
  }

  componentDidMount(): void {
      request
          .get('http://localhost:8000/pokemon')
          .set('accept', 'application/json')
          .then(data => {
              this.setState({
                  pokemonList: data.body
              })
          })
      ;
  }

  renderPokemonCard = (pokemon: PokemonInterface) => (
      <div key={pokemon.id}>
        <p>{pokemon.name}</p>
        <img src={pokemon.spriteUrl} />
      </div>
  )

  render(): React.ReactNode {
    return (
        <React.Fragment>
            <StyledIntro>
                <div className="home">
                    {this.state.pokemonList.map(pokemon => this.renderPokemonCard(pokemon))}
                </div>
            </StyledIntro>
        </React.Fragment>
    )
  }

}

export default Home;
