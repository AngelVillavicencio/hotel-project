import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import {Divider,Flex, Button, Checkbox, Form, Input } from 'antd';


export default function ReservaHabitacion({ auth }) {
  const onFinish = (values) => {
    console.log('Success:', values);
  };
  const onFinishFailed = (errorInfo) => {
    console.log('Failed:', errorInfo);
  };
    return (
        <AuthenticatedLayout
            user={auth.user}
            title={"Reserva Habitación"}
        >
            <Head title="Reserva habitación" />
            <Divider orientation="left">Datos del cliente</Divider>
            <div >
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <Form
                      name="basic_"
                      labelCol={{
                        span: 8,
                      }}
                      wrapperCol={{
                        span: 16,
                      }}
                      style={{
                        maxWidth: 600,
                      }}
                      initialValues={{
                        remember: true,
                      }}
                      onFinish={onFinish}
                      onFinishFailed={onFinishFailed}
                      autoComplete="off"
                    > 
                    <Form.Item
                          label="Username"
                          name="username"
                          rules={[
                            {
                              required: true,
                              message: 'Please input your username!',
                            },
                          ]}
                        >
                          <Input />
                        </Form.Item>

                        <Form.Item
                          label="Password"
                          name="password"
                          rules={[
                            {
                              required: true,
                              message: 'Please input your password!',
                            },
                          ]}
                        >
                          <Input />
                        </Form.Item>


                        
                      <Form.Item
                        name="remember"
                        valuePropName="checked"
                        wrapperCol={{
                          offset: 8,
                          span: 16,
                        }}
                      >
                        <Checkbox>Remember me</Checkbox>
                      </Form.Item>

                      <Form.Item
                        wrapperCol={{
                          offset: 8,
                          span: 16,
                        }}
                      >
                        <Button type="primary" htmlType="submit">
                          Submit
                        </Button>
                      </Form.Item>
                    </Form>

                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
