/**
 * Created by usamaahmed on 5/17/17.
 */
export const initialState = {
    //areas : {},
    commercial : {
        catId : '',
        isParent : false,
        isSub : false,
        main : '',
        sub : '',
        brands : {},
        types : {},
        max : '',
        min : '',
        condition : '',
        manufactuering_year : '',
        transmission : '',
        room_no : '',
        bathroom_no : '',
        floor_no : '',
        searchItem : ''
    },
    properties : {
        isLoading : false,
        _token : '',
        areas : []
    }
}

export const ENABLE_LOADING = 'ENABLE_LOADING';
export const DISABLE_LOADING = 'DISABLE_LOADING';
export const AREA_INDEX = 'AREA_INDEX ';
export const MAKE_VISABLE = 'MAKE_VISABLE ';
export const MAKE_INVISABLE = 'MAKE_INVISABLE ';
export const IMPORT_FIELDS = 'IMPORT_FIELDS ';
export const SHOW_FIELDS = 'SHOW_FIELDS ';
export const HIDE_FIELDS = 'HIDE_FIELDS ';
