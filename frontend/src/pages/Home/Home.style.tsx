import styled from 'styled-components';

import Pokemon from 'components/Pokemon';

export const StyledContainer = styled.div`
  padding: 20px;
  text-align: center;
`;

export const StyledPokemonContainer = styled.div`
  display: flex;
  justify-content: center;
  flex-direction: row;
  flex-wrap: wrap;
  max-width: 100;
`;

export const StyledPokemon = styled(Pokemon)`
  margin: 10px;
`;

export const StyledText = styled.p`
  color: red;
  font-family: 'Pokemon', Sans-Serif;
  font-size: 15px;
  margin-bottom: 10px;
`;

export const StyledTitle = styled.p`
  font-family: 'Pokemon', Sans-Serif;
  font-size: 30px;
  margin-bottom: 30px;
`;
