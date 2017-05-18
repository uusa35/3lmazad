/**
 * Created by usamaahmed on 5/17/17.
 */
import { combineReducers } from 'redux';
import commercialReducers from './commercialReducers';
import propertiesReducers from './propertiesReducers'

const rootReducers = combineReducers({
    properties: propertiesReducers,
    commercial: commercialReducers
});

export default rootReducers;