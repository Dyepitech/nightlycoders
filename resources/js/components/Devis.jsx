import React, { Component } from 'react'
import PersonalDetails from './PersonalDetails';
import Prestation from './Prestation';
import StepOne from './StepOne'
import axios from 'axios';
import Final from './Final';

export default class Devis extends Component {
    state = {
        step: 1,
        firstname: '',
        lastname: '',
        email: '',
        phone: '',
        situation: 'Particulier',
        society: '',
        prestation: '',
        pages: 1,
    }

    prevStep = () => {
        const { step } = this.state;
        this.setState({ step: step - 1 });
    }

    saveDevis = async () => {
        const res = await axios.post('http://localhost:8000/devis/save', this.state);
        const { step } = this.state;

        if (res.data.status === 200)
            this.setState({ step: step + 1 });

    }

    nextStep = () => {
        const { step } = this.state;
        this.setState({ step: step + 1 });
    }

    handleChange = input => e => {
        this.setState({ [input]: e.target.value });
    }

    render() {
        const { step } = this.state;
        const { firstname, lastname, phone, situation, society, prestation, email, pages } = this.state;
        const values = { firstname, lastname, phone, situation, society, prestation, email, pages }

        switch (step) {
            case 1:
                return (
                    <PersonalDetails
                        nextStep = {this.nextStep}
                        handleChange = {this.handleChange}
                        values = {values}
                    />
                )
            case 2:
                return (
                    <Prestation
                        nextStep = {this.nextStep}
                        prevStep = {this.prevStep}
                        saveDevis = {this.saveDevis}
                        handleChange = {this.handleChange}
                        values = {values}
                    />
                )
            case 3:
                return (
                    <Final
                    nextStep = {this.nextStep}
                    prevStep = {this.prevStep}
                    handleChange = {this.handleChange}
                    values = {values}
                />  
                )
            default:
            // do nothing
        }
    }
}
