import styled from 'styled-components';

const StyledRoot = styled.div`
  .header {
    background-color: #ef5350;
    height: 50px;
    align-items: center;
    display: flex;
  }
  
  .header__wrapper {
    flex: 1;
    max-width: 72rem;
    margin: auto;
    display: flex;
  } 

  .logo {
    height: 40px;
  }
`;

export default StyledRoot;
