/**
 * Created by usamaahmed on 5/17/17.
 */
let commercialReducers = function(commercial = {}, action) {
    switch (action.type) {
        case 'COMMERCIAL_INDEX' :
            return commercial;
        default :
            return commercial;
    }
};

export default commercialReducers;