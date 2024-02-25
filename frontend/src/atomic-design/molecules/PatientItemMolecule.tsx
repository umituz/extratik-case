import { Button, Card, Col } from "react-bootstrap";
import Link from "next/link";
import React from "react";
import { PatientItemInterface } from "@/interfaces/PatientItemInterface";
import { FaUserMd, FaUserFriends, FaInfoCircle } from 'react-icons/fa';
import ButtonComponent from "@/atomic-design/atoms/ButtonComponent";

const PatientItemMolecule = ({ patient, hasLink }: PatientItemInterface) => {
    if (patient) {
        const fullName = `${patient.Name} ${patient.Surname}`;
        const patientDetailsLink = `/patients/${patient.IdCard}`;

        const renderMedicalInfo = (medicalInfo) => (
            <>
                <h5><FaUserMd /> Medical Information</h5>
                <p>Conditions: {medicalInfo.Conditions.map(condition => condition.Name).join(', ')}</p>
                <p>Allergies: {medicalInfo.Allergies.map(allergy => allergy.Name).join(', ')}</p>
                <p>Medications: {medicalInfo.Medications.map(medication => medication.Name).join(', ')}</p>
            </>
        );

        const renderNextOfKin = (nextOfKin) => (
            <>
                <h5><FaUserFriends /> Next of Kin</h5>
                {nextOfKin.map(kin => (
                    <p key={kin.IdCard}>{kin.Name} {kin.Surname} - Contact: {kin.ContactNumber1}</p>
                ))}
            </>
        );

        return (
            <Col lg={12}>
                <Card className="mb-4 patient-card">
                    <Card.Body>
                        <h2 className="card-title h4">{fullName}</h2>
                        <p className="card-text"><FaInfoCircle /> ID Card: {patient.IdCard}</p>
                        <p className="card-text"><FaInfoCircle /> Gender: {patient.Gender}</p>
                        {!hasLink && (
                            <>
                                <p className="card-text"><FaInfoCircle/> Date Of Birth: {patient.DateOfBirth}</p>
                                <p className="card-text"><FaInfoCircle/> Address: {patient.Address}</p>
                                <p className="card-text"><FaInfoCircle/> Post Code: {patient.Postcode}</p>
                                <p className="card-text"><FaInfoCircle/> Contact Number 1: {patient.ContactNumber1}</p>
                                <p className="card-text"><FaInfoCircle/> Contact Number 2: {patient.ContactNumber2}</p>
                            </>
                        )}

                        {!hasLink && patient.Medical && renderMedicalInfo(patient.Medical)}
                        {!hasLink && patient.NextOfKin && renderNextOfKin(patient.NextOfKin)}
                        {hasLink && (
                            <Link href={patientDetailsLink}>
                                <ButtonComponent variant="primary" type="button">
                                    See details →
                                </ButtonComponent>
                            </Link>
                        )}
                    </Card.Body>
                </Card>
            </Col>
        );
    } else {
        return (
            <Col lg={6}>
                <Card className="mb-4 patient-card">
                    <Card.Body>
                        <p className="card-text">No Data Yet!</p>
                    </Card.Body>
                </Card>
            </Col>
        );
    }
}

export default PatientItemMolecule;
