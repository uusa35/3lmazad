/**
 * Created by usamaahmed on 5/17/17.
 */
export const categorySelected = (catId) => async dispatch => {
    return {
        type: 'CATEGORY_CHOOSEN',
        catId
    }
}

export const importFields = (catId) => {
    return {
        type: 'IMPORT_FIELDS',
        catId
    }
}

