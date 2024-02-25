import React from "react";
import {Col, Row} from "react-bootstrap";
import PaginationComponent from "@/components/PaginationComponent";
import {usePatientContext} from "@/contexts/PatientContext";
import PatientItemMolecule from "@/atomic-design/molecules/PatientItemMolecule";

const PatientListOrganism = () => {
    const {
        patients,
        currentPage,
        lastPage,
        handlePageChange,
    } = usePatientContext();

    return (
        <Row>
            <Col lg={12}>
                <Row>
                    {patients?.map((patient) => (
                        <Col md={3} key={patient.Id}>
                            <PatientItemMolecule patient={patient} hasLink={true}/>
                        </Col>
                    ))}
                </Row>
                <Row>
                    <Col md={12} className="text-center mt-3">
                        <PaginationComponent
                            currentPage={currentPage}
                            lastPage={lastPage}
                            onPageChange={handlePageChange}
                            total={patients.length}
                        />
                    </Col>
                </Row>
            </Col>
        </Row>
    )
}

export default PatientListOrganism;
