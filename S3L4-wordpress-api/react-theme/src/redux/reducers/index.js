// import { CASE1 } from '../actions';

const initialState = {
    user: null,
};

const mainReducer = (state = initialState, action) => {
    // return newState

    switch (action.type) {
        // case CASE1:
        //     return {
        //         ...state,
        //     };

        default:
            return state;
    }
};

export default mainReducer;
