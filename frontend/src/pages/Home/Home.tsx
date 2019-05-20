import * as React from 'react';

import Pokemon from 'components/Pokemon';
import Style from './Home.style';
import { makeGetRequest } from 'services/networking/request';

interface Props {}
interface State {
  pokemons: {
    name: string;
    id: number;
  }[];
}

class Home extends React.Component<Props, State> {
  componentDidMount = () => {
    makeGetRequest('/pokemon')
      .then(response => response.body)
      .then(pokemons => this.setState({ pokemons }));
  };

  render(): React.ReactNode {
    return (
      <Style.Intro>
        {this.state &&
          this.state.pokemons &&
          this.state.pokemons.map(pokemon => (
            <Pokemon key={pokemon.id} name={pokemon.name} id={pokemon.id} />
          ))}
      </Style.Intro>
    );
  }
}

export default Home;
