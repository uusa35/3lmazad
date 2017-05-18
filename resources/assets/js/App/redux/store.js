/**
 * Created by usamaahmed on 5/17/17.
 */
import { compose , applyMiddleware , createStore } from 'redux';
import thunkMiddleware from 'redux-thunk';
import { createLogger } from 'redux-logger';
import rootReducer from './reducers';
import { initialState } from '../Constants';

let finalCreateStore = compose(applyMiddleware(thunkMiddleware,createLogger()))(createStore);

function configureStore(initialState) {
    return finalCreateStore(rootReducer,initialState);
}

export default configureStore;