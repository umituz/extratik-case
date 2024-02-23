import React from "react";
import {Col, Row} from "react-bootstrap";
import PaginationComponent from "@/components/PaginationComponent";
import {usePatientContext} from "@/contexts/PatientContext";
import PatientListMolecule from "@/atomic-design/molecules/PatientListMolecule";
import SearchMolecule from "@/atomic-design/molecules/SearchMolecule";

const PatientListOrganism = () => {
    const {
        patients,
        currentPage,
        lastPage,
        handlePageChange,
        handleSearch,
    } = usePatientContext();

    return (
        <Row>
            <Col lg={8}>
                <Row>
                    <PatientListMolecule patients={patients} />
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

            <Col lg={4}>
                <SearchMolecule handleSearch={handleSearch} />
            </Col>
        </Row>
    )
}

export default PatientListOrganism;