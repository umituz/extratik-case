import {Container} from "react-bootstrap";
import React from "react";
import MainLayout from "@/layouts/MainLayout";
import PatientItemMolecule from "@/atomic-design/molecules/PatientItemMolecule";

const PatientDetailTemplate = ({patient}) => {
    return (
        <MainLayout title={patient.Name} description={patient.Surname}>
            <Container className="mt-2 minHeight pb-5">
                <PatientItemMolecule key={patient.Id} patient={patient} hasLink={false}/>
            </Container>
        </MainLayout>
    );
}

export default PatientDetailTemplate;