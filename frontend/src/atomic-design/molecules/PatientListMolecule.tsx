import React from "react";
import {Row} from "react-bootstrap";
import PatientItemMolecule from "@/atomic-design/molecules/PatientItemMolecule";

const PatientListMolecule = ({ patients }) => {
    return (
        <Row>
            {patients?.map((patient) => (
                <PatientItemMolecule key={patient.Id} patient={patient} hasLink={true}/>
            ))}
        </Row>
    )
}

export default PatientListMolecule;