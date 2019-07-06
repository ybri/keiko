import * as React from 'react';

import { PokemonApi } from 'components/Pokemon/Pokemon.type';
import {
  StyledContainer,
  StyledPokemon,
  StyledPokemonContainer,
  StyledText,
  StyledTitle,
} from './Home.style';
import { makeGetRequest } from 'services/networking/request';

interface Props {}
interface State {
  error: boolean;
  isLoading: boolean;
  pokemons: PokemonApi[];
}

class Home extends React.Component<Props, State> {
  state: Readonly<State> = {
    error: false,
    isLoading: true,
    pokemons: [],
  };

  componentDidMount = () => {
    makeGetRequest('/pokemon')
      .then(response => response.body)
      .then(pokemons => this.setState({ pokemons, isLoading: false }))
      .catch(() => this.setState({ error: true, isLoading: false }));
  };

  render(): React.ReactNode {
    const { error, isLoading, pokemons } = this.state;
    return (
      <StyledContainer>
        <StyledTitle>Pokedex</StyledTitle>
        <StyledPokemonContainer>
          {error && <StyledText>An error occurred while fetching the pokemons</StyledText>}
          {isLoading && (
            <div>
              <img src="./loader.svg" width={300} />
            </div>
          )}
          {!error && !isLoading && (
            <>
              {pokemons.map(pokemon => (
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
