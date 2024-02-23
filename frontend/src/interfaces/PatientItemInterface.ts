export interface PatientItemInterface {
    patient: {
        Id: number;
        IdCard: string;
        Name: string;
        Surname: string;
        Gender: string;
        DateOfBirth: string;
        Address: string;
        Postcode: string;
        ContactNumber1: string;
        ContactNumber2?: string;
        NextOfKin: Array<{
            IdCard: string;
            Name: string;
            Surname: string;
            ContactNumber1: string;
            ContactNumber2?: string;
        }>;
        Medical: {
            Conditions: Array<{Name: string, Notes: string}>;
            Allergies: Array<{Name: string, Notes: string}>;
            Medications: Array<{Name: string, StartDate: string, EndDate: string, Notes: string}>;
        };
    } | null;
    hasLink: boolean
}