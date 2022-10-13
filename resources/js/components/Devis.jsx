import React, { Component } from 'react'
import PersonalDetails from './PersonalDetails';
import Prestation from './Prestation';
import StepOne from './StepOne'
import Final from './Final'
export default class Devis extends Component {
    state = {
        step: 1,
        firstname: '',
        lastname: '',
        email: '',
        phone: '',
        particular: 0,
        profesionnal: 0,
        society: '',
        prestation: '',
    }

    prevStep = () => {
        const { step } = this.state;
        this.setState({ step: step - 1 });
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
                    // <Confirmation />
                )
            case 4:
                return (
                    <h1>ok</h1>
                    // <Success />
                )
            default:
            // do nothing
        }
    }
}
