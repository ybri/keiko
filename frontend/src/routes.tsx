import React, { lazy, Suspense } from 'react';
import { Route, Switch } from 'react-router';

const Home = lazy(() => import('./pages/Home'));

const routes = () => (
  <Suspense fallback={<div>Loading...</div>}>
    <Switch>
      <Route exact path="/" component={Home} />
    </Switch>
  </Suspense>
);

export default routes;
