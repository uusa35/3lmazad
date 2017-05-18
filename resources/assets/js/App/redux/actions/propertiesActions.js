/**
 * Created by usamaahmed on 5/17/17.
 */
import axios from 'axios';
import * as actions from './../../Constants';

export const enableLoading = () => {
    return {
        type: 'ENABLE_LOADING'
    }
}

export const disableLoading = () => {
    return {
        type: 'DISABLE_LOADING'
    }
}

export const fetchAreas = () => async (dispatch) => {
    let areas = await axios.get('/api/areas').then(r => r.data).catch(e => console.log(e));
    return dispatch(injectAreas(areas));
}

export const injectAreas = (areas) => {
    return {
        type: actions.AREA_INDEX,
        areas
    }
}

export const setToken = () => async dispatch => {
    //let token = await axios.get('/auth/token').(r => console.log(r));
    //if(token) {
    //    return {
    //
    //    }
    //}
    return {
        type: 'SET_TOKEN',
        token: 'token value here !!!'
    }
}