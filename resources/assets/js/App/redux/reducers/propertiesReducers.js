/**
 * Created by usamaahmed on 5/17/17.
 */

import * as actions from './../../Constants';

let propertiesReducers = function(properties = {}, action) {
    switch (action.type) {
        case actions.ENABLE_LOADING :
            return properties;
        case actions.AREA_INDEX :
            return Object.assign({}, properties,
                {
                    areas: action.areas
                }
            );
        default :
            return properties
    }
}

export default propertiesReducers;