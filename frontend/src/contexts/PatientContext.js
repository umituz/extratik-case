import React, {createContext, useContext, useEffect, useState} from 'react';
import {useDispatch, useSelector} from 'react-redux';
import {GetMethodService} from '@/services/GetMethodService';
import {setPatients} from "@/stores/actions/PatientActions";
import Loading from "@/components/Loading";

const PatientContext = createContext();

export const usePatientContext = () => {
    return useContext(PatientContext);
};

export const PatientProvider = ({children}) => {
    const dispatch = useDispatch();
    const patients = useSelector((state) => state.patientReducer.patients);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [toastMessage, setToastMessage] = useState(null);
    const [isLoading, setIsLoading] = useState(false);

    useEffect(() => {
        async function fetchData() {
            setIsLoading(true);
            try {
                const response = await GetMethodService(`patients?page=${currentPage}`);

                dispatch(setPatients(response?.data.data));
                setLastPage(response?.data.last_page);
            } catch (error) {
                setToastMessage({message: 'Data Loading Issue', type: 'error'});
            } finally {
                setIsLoading(false);
            }
        }

        fetchData();
    }, [currentPage, dispatch]);

    const handlePageChange = (newPage) => {
        setCurrentPage(newPage);
    };

    return (
        <PatientContext.Provider
            value={{
                patients,
                currentPage,
                lastPage,
                toastMessage,
                handlePageChange,
            }}
        >
            {isLoading ? <Loading /> : children}
        </PatientContext.Provider>
    );
};
