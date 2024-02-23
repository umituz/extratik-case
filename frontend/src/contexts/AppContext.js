import React from 'react';
import {PatientProvider} from "./PatientContext";

const AppProvider = ({children}) => {
        return (
            <PatientProvider>
               {children}
            </PatientProvider>
        )
};

export default AppProvider;
