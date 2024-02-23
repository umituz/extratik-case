import thunk from "redux-thunk";
import {createStore, combineReducers, applyMiddleware} from 'redux';
import {patientReducer} from "./reducers/PatientReducer";

export const middlewares = [thunk];

const rootReducer = combineReducers({
    patientReducer: patientReducer,
});

export const createStoreWithMiddleware = applyMiddleware(...middlewares)(createStore);

export const store = createStoreWithMiddleware(rootReducer)

export default store;
