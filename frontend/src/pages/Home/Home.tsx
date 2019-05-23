import * as React from 'react';

import { PokemonApi } from 'components/Pokemon/Pokemon.type';
import { StyledContainer, StyledPokemon, StyledPokemonContainer, StyledTitle } from './Home.style';
import { makeGetRequest } from 'services/networking/request';

interface Props {}
interface State {
  pokemons: PokemonApi[];
}

class Home extends React.Component<Props, State> {
  componentDidMount = () => {
    makeGetRequest('/pokemon')
      .then(response => response.body)
      .then(pokemons => this.setState({ pokemons }));
  };

  render(): React.ReactNode {
    return (
      <StyledContainer>
        <StyledTitle>Pokedex</StyledTitle>
        <StyledPokemonContainer>
          {this.state &&
            this.state.pokemons &&
            this.state.pokemons.map(pokemon => (
              <StyledPokemon key={pokemon.id} pokemon={pokemon} />
            ))}
        </StyledPokemonContainer>
      </StyledContainer>
    );
  }
}

export default Home;
