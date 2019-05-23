import * as React from 'react';

import { PokemonApi } from './Pokemon.type';
import { Container, Text, Title } from './Pokemon.style';

interface Props {
  className?: string;
  pokemon: PokemonApi;
}

class Pokemon extends React.Component<Props> {
  render(): React.ReactNode {
    const { className, pokemon } = this.props;

    return (
      <Container className={className}>
        <Title>{pokemon.name}</Title>
        <div>
          <img
            src={`https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${
              pokemon.id
            }.png`}
          />
        </div>
        <Text>Id: {pokemon.id}</Text>
        <Text>Weight: {pokemon.weight / 10} kg</Text>
        <Text>Height: {pokemon.height * 10} cm</Text>
      </Container>
    );
  }
}

export default Pokemon;
