import styled from 'styled-components';

export const Container = styled.div`
  display: flex;
  flex-direction: column;
  align-items: center;
  font-family: 'Pokemon', Sans-Serif;
  padding: 10px;
  width: 220px;
  border: black 5px double;
`;

export const Text = styled.p`
  font-size: 10px;
  margin-bottom: 4px;
`;

export const Title = styled.p`
  text-transform: capitalize;
  font-size: 12px;
`;
