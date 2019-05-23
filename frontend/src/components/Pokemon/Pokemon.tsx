import * as React from 'react';

import { Container } from './Pokemon.style';

interface Props {
  name: string;
  id: number;
}

class Pokemon extends React.Component<Props> {
  render(): React.ReactNode {
    return (
      <div>
      <Container>
        <p>Voici mon premier pokemon:</p>
        <p>
          {this.props.name}: n°{this.props.id}
        </p>
        <img
          src={`https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${
            this.props.id
          }.png`}
        />
      </div>
      </Container>
    );
  }
}

export default Pokemon;
