import * as React from 'react';

import Pokemon from 'components/Pokemon';
import Style from './Home.style';

class Home extends React.Component {
  render(): React.ReactNode {
    return (
      <Style.Intro>
        <Pokemon name="Carapuce" id={7} />
      </Style.Intro>
    );
  }
}

export default Home;
