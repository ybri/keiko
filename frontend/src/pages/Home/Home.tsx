import * as React from 'react';

import { PokemonApi } from 'components/Pokemon/Pokemon.type';
import { StyledContainer, StyledPokemon, StyledPokemonContainer, StyledTitle } from './Home.style';
import { makeGetRequest } from 'services/networking/request';

interface Props {}
interface State {
  pokemons: PokemonApi[];
  isLoading: boolean;
}

class Home extends React.Component<Props, State> {
  state: Readonly<State> = {
    pokemons: [],
    isLoading: true,
  };

  componentDidMount = () => {
    makeGetRequest('/pokemon')
      .then(response => response.body)
      .then(pokemons => this.setState({ pokemons, isLoading: false }));
  };

  render(): React.ReactNode {
    return (
      <StyledContainer>
        <StyledTitle>Pokedex</StyledTitle>
        <StyledPokemonContainer>
          {this.state.isLoading || !this.state.isLoading ? (
            <div>
              <img src="./loader.svg" width={300} />
            </div>
          ) : (
            <>
              {this.state.pokemons.map(pokemon => (
                <StyledPokemon key={pokemon.id} pokemon={pokemon} />
              ))}
            </>
          )}
        </StyledPokemonContainer>
      </StyledContainer>
    );
  }
}

export default Home;
