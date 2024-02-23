import React from 'react';
import {GetMethodService} from '@/services/GetMethodService';
import PatientDetailTemplate from "@/atomic-design/templates/PatientDetailTemplate";

export default function PatientDetail({patient}) {
    return (
        <PatientDetailTemplate patient={patient}/>
    )
}

export async function getServerSideProps(context) {
    const {slug} = context.query;

    try {
        const response = await GetMethodService(`patients/${slug}`);
        const patient = response.data;

        if (!patient) {
            throw new Error("Patient not found");
        }

        return {
            props: {
                patient
            },
        };
    } catch (error) {
        console.error(error);

        return {
            notFound: true,
        };
    }
}
