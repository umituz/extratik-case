import React from "react";
import {Container} from "react-bootstrap";
import MainLayout from "@/layouts/MainLayout";
import PatientListOrganism from "@/atomic-design/organisms/PatientListOrganism";

const PatientListTemplate = () => {
    return (
        <MainLayout title={"Patient List"} description={"Patient List Description"}>
            <Container className="mt-2 minHeight pb-5">
                <PatientListOrganism/>
            </Container>
        </MainLayout>
    )
}

export default PatientListTemplate;
