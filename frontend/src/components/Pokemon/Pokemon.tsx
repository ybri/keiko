import * as React from 'react';

interface Props {
  name: string;
  id: number;
}

class Pokemon extends React.Component<Props> {
  render(): React.ReactNode {
    return (
      <div>
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
    );
  }
}

export default Pokemon;
