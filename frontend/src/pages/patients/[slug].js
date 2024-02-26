import React, { useEffect, useState } from 'react';
import { useRouter } from 'next/router';
import { GetMethodService } from '@/services/GetMethodService';
import PatientDetailTemplate from "@/atomic-design/templates/PatientDetailTemplate";
import Loading from "@/components/Loading";

export default function PatientDetail() {
    const [patient, setPatient] = useState(null);
    const router = useRouter();
    const { slug } = router.query;

    useEffect(() => {
        async function fetchPatientData() {
            if (slug) {
                try {
                    const response = await GetMethodService(`patients/${slug}`);
                    setPatient(response.data);
                } catch (error) {
                    console.error("Error fetching patient data:", error);
                }
            }
        }

        fetchPatientData();
    }, [slug]);

    if (!patient) {
        return <Loading />;
    }

    return (
        <PatientDetailTemplate patient={patient} />
    );
}
